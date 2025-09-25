# Fix: Call to a member function documents() on null

## 🐛 **Issue Description**
Error "Call to a member function documents() on null" terjadi ketika aplikasi mencoba memanggil method `documents()` pada objek yang bernilai null. Ini biasa terjadi ketika:
- Data `Legislation` tidak ada di database (query return null)
- Relasi `masterDocument()` return null
- Akses chain method tanpa null check

## ✅ **Root Causes Fixed**

### 1. **HomepageController.php**
**Problem**: `$popularLaw` dan `$monograph` bisa null tapi langsung diakses
```php
// Before (ERROR)
$popularLaw = Legislation::ofType(1)->popular()->first();
$popularLawDoc = $popularLaw->documents()  // ❌ NULL->documents()

$monograph = Legislation::ofType(2)->published()->latest()->first();
$cover = $monograph->documents()  // ❌ NULL->documents()
```

**Fixed**: Added null safety operator
```php
// After (FIXED)
$popularLaw = Legislation::ofType(1)->popular()->first();
$popularLawDoc = $popularLaw?->documents()  // ✅ Safe null check
    ->ofType('master')
    ->first();

$monograph = Legislation::ofType(2)->published()->latest()->first();
$cover = $monograph?->documents()  // ✅ Safe null check
    ->ofType('cover')
    ->first();
```

### 2. **Blade Templates Fixed**

#### **homepage/index.blade.php**
- Added null check for `$popularLawDocument`
- Wrapped popular law section in `@if($popularLawDocument)` 
- Added safe variable assignment with `@php`

#### **legislation/law/show.blade.php**
- Added null check for `$masterDoc` and `$masterDoc->media`
- Protected PDF viewer and download button
- Added fallback when document not available

#### **legislation/monograph/show.blade.php**  
- Added safe document access with null checks
- Protected PDF viewer with fallback message
- Fixed download button with null safety

#### **legislation/article/show.blade.php**
- Added null checks for master document access
- Protected PDF viewer and download sections
- Added fallback UI when document unavailable

#### **legislation/judgment/show.blade.php**
- Added master document null safety
- Protected PDF viewer with conditional rendering  
- Fixed download form with null checks

## 🔧 **Technical Solutions Applied**

### **1. PHP 8.0+ Null Safe Operator**
```php
// Using null safe operator (?->)
$document = $legislation?->masterDocument();
$media = $document?->media;
```

### **2. Blade Template Guards**
```blade
@php
    $masterDoc = $legislation->masterDocument();
@endphp
@if($masterDoc && $masterDoc->media)
    <!-- Safe to access -->
@else
    <!-- Fallback content -->
@endif
```

### **3. Defensive Programming**
```php
// Instead of direct chain
$legislation->masterDocument()->media->name  // ❌ Can break

// Use null checks
$masterDoc = $legislation->masterDocument();
if ($masterDoc && $masterDoc->media) {
    $name = $masterDoc->media->name;  // ✅ Safe
}
```

## 🎯 **Files Modified**

### Controllers:
- ✅ `app/Http/Controllers/Jdih/HomepageController.php`

### Blade Templates:
- ✅ `resources/views/jdih/homepage/index.blade.php`
- ✅ `resources/views/jdih/legislation/law/show.blade.php` 
- ✅ `resources/views/jdih/legislation/monograph/show.blade.php`
- ✅ `resources/views/jdih/legislation/article/show.blade.php`
- ✅ `resources/views/jdih/legislation/judgment/show.blade.php`

## ✨ **Result**
- ✅ No more "Call to a member function documents() on null" errors
- ✅ Application loads successfully on http://127.0.0.1:8000
- ✅ Graceful fallback when documents are missing
- ✅ Better user experience with proper error handling
- ✅ Server runs without PHP errors

## 📋 **Prevention Best Practices**

### **1. Always Use Null Checks**
```php
// Good
$document = $model?->relation()?->method();

// Better  
if ($model && $model->relation()) {
    $document = $model->relation()->method();
}
```

### **2. Blade Template Safety**
```blade
@if(isset($variable) && $variable->relation)
    {{ $variable->relation->property }}
@endif
```

### **3. Model Method Safety**
```php
public function safeMethod()
{
    $relation = $this->relation();
    return $relation ? $relation->property : null;
}
```

---

**Status**: ✅ **RESOLVED**  
**Server**: ✅ **Running at http://127.0.0.1:8000**