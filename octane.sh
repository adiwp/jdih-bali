#!/bin/bash

# JDIH CMS - Laravel Octane with FrankenPHP
# This script helps you manage the Laravel Octane server

# Function to load environment variables safely
load_env() {
    if [ -f .env ]; then
        while IFS='=' read -r key value; do
            # Skip comments and empty lines
            if [[ $key =~ ^[[:space:]]*# ]] || [[ -z $key ]]; then
                continue
            fi
            # Remove quotes from value
            value=$(echo "$value" | sed -e 's/^"//' -e 's/"$//' -e "s/^'//" -e "s/'$//")
            export "$key"="$value"
        done < .env
    fi
}

# Load environment
load_env

# Default values
HOST=${OCTANE_HOST:-127.0.0.1}
PORT=${OCTANE_PORT:-8000}
WORKERS=${OCTANE_WORKERS:-4}
MAX_REQUESTS=${OCTANE_MAX_REQUESTS:-500}

case "$1" in
    start)
        echo "Starting Laravel Octane with FrankenPHP..."
        echo "Server will be available at: http://$HOST:$PORT"
        echo "Workers: $WORKERS | Max Requests: $MAX_REQUESTS"
        php artisan octane:start --host=$HOST --port=$PORT --workers=$WORKERS --max-requests=$MAX_REQUESTS
        ;;
    start-watch)
        echo "Starting Laravel Octane with FrankenPHP (Watch mode)..."
        echo "Server will be available at: http://$HOST:$PORT"
        echo "Workers: $WORKERS | Max Requests: $MAX_REQUESTS"
        echo "Watch mode: Server will auto-restart on file changes"
        php artisan octane:start --host=$HOST --port=$PORT --workers=$WORKERS --max-requests=$MAX_REQUESTS --watch
        ;;
    stop)
        echo "Stopping Laravel Octane..."
        php artisan octane:stop
        ;;
    restart)
        echo "Restarting Laravel Octane..."
        php artisan octane:restart
        ;;
    reload)
        echo "Reloading Laravel Octane workers..."
        php artisan octane:reload
        ;;
    status)
        echo "Checking Laravel Octane status..."
        php artisan octane:status
        ;;
    *)
        echo "Usage: $0 {start|start-watch|stop|restart|reload|status}"
        echo ""
        echo "Commands:"
        echo "  start       - Start the Octane server"
        echo "  start-watch - Start the Octane server with file watching"
        echo "  stop        - Stop the Octane server"
        echo "  restart     - Restart the Octane server"
        echo "  reload      - Reload the Octane workers"
        echo "  status      - Check the Octane server status"
        echo ""
        echo "Configuration:"
        echo "  Host: $HOST"
        echo "  Port: $PORT"
        echo "  Workers: $WORKERS"
        echo "  Max Requests: $MAX_REQUESTS"
        exit 1
        ;;
esac