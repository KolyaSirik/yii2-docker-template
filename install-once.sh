#!/usr/bin/env bash
echo 'Enter project name: '
read PROJECT_NAME
echo 'Which port should be exposed: '
read PORT

if [ -z ${PROJECT_NAME} ] || [ -z ${PORT} ] ; then
    echo 'Invalid arguments!'
    exit 1
fi
