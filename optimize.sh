#!/usr/bin/env sh

for file in output/* ; do
  jpegoptim "$file"
done
