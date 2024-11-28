#!/bin/bash
# wait-for-it.sh

host="$1"
shift
cmd="$@"

until mysqladmin ping -h"$host" --silent; do
  echo "Waiting for database connection..."
  sleep 2
done

exec $cmd