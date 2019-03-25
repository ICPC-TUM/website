#!/bin/bash
# FILES="$@"
shopt -s globstar
shopt -s nullglob

for i in images/**/*.meta.yml
do
	echo -n "Deleting thumbnail information $i."
	rm $i
done

for i in images/**/*.{jpeg,jpg,png,JPG,JPEG,PNG}
do
	if [[ $(basename $i) =~ ^thumb\..* ]]; then
		echo -n " Deleting thumbnail $i."
		rm $i
	fi
done
