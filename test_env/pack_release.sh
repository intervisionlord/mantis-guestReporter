#!/bin/bash

grep "VERSION" core/core.php | cut -d"'" -f2 > version.file
zip -r mantis-reporter-`cat version.file`.zip * -x "*/\." -x "test_env/*" -x "CODE_OF_CONDUCT.md" -x "*_secret.php" -x "version.file"
rm -f version.file
