#!/usr/bin/env bash

set -euo pipefail

if [ "$#" -ne 1 ]; then
    echo "Usage: $0 <version>"
    echo "Example: $0 0.5.0"
    exit 1
fi

VERSION="$1"
TAG="v${VERSION}"

if ! [[ "$VERSION" =~ ^[0-9]+\.[0-9]+\.[0-9]+([.-][0-9A-Za-z.-]+)?$ ]]; then
    echo "Invalid version: $VERSION"
    exit 1
fi

if ! git rev-parse --is-inside-work-tree > /dev/null 2>&1; then
    echo "Not inside a Git repository."
    exit 1
fi

if git rev-parse "$TAG" >/dev/null 2>&1; then
    echo "Tag $TAG already exists."
    exit 1
fi

echo "Deploying version $VERSION"

git add .

if git diff --cached --quiet; then
    echo "No changes to commit."
    exit 1
fi

git commit -m "$TAG"
git tag "$TAG"

CURRENT_BRANCH="$(git branch --show-current)"

git push origin "$CURRENT_BRANCH"
git push origin "$TAG"

echo "Version $VERSION deployed successfully."