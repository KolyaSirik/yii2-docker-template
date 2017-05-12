#!/usr/bin/env bash
echo 'Enter project name: '
read PROJECT_NAME
echo 'Which port should be exposed: '
read PORT

if [ -z ${PROJECT_NAME} ] || [ -z ${PORT} ] ; then
    echo 'Invalid arguments!'
    exit 1
fi

find config -type f -exec sed -i "s/example_project/$PROJECT_NAME/g" {} +
find app/environments -type f -exec sed -i "s/example_project/$PROJECT_NAME/g" {} +
find config/common-compose.tml -exec sed -i "s/12421/$PORT/g" {} +
echo 'Done!'
echo 'Have a nice day!'
