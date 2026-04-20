#!/bin/bash

# Load configurations
if [ -f .deploy.conf ]; then
    source .deploy.conf
else
    echo "Error: .deploy.conf not found!"
    exit 1
fi

echo "🚀 Starting Deployment to $DEPLOY_HOST..."

# Ensure target directory exists on server
ssh $DEPLOY_USER@$DEPLOY_HOST "mkdir -p $DEPLOY_PATH"

# Sync files to server
# --delete: remove files on server that are not in local (be careful if used)
# --exclude: don't send these files
rsync -avz --progress \
    --exclude='.git' \
    --exclude='node_modules' \
    --exclude='vendor' \
    --exclude='.env' \
    --exclude='.deploy.conf' \
    --exclude='storage' \
    --exclude='docker/db/data' \
    ./ $DEPLOY_USER@$DEPLOY_HOST:$DEPLOY_PATH

echo "🐳 Restarting Docker Containers on Server..."

# Execute docker command on server
ssh $DEPLOY_USER@$DEPLOY_HOST "cd $DEPLOY_PATH && docker compose up -d --build"

echo "✅ Deployment Finished!"
