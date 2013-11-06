#!/bin/sh
sed -e "s/^\//debian\//" debian/.gitignore | xargs -n1 echo 'rm -rf ' | sh

