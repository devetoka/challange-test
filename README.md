# challenge-test

### Challenge


Write	a	process	that	imports	the	contents	of	a	JSON-file	cleanly	and	consistently	to	a	database.Preferably	this	is	done	as	a	background	job	in	Laravel.	Docker	useis	encouraged(but	not	required)

### How to run

- clone this repo
- At the root level of the files, run `docker-compose up --build`
- After successful build and run, run `sh setup.sh` in git bash from a linux OS or `winpty sh setup.sh` from a windows OS (in another terminal)
- run `dos2unix install.sh && sh install.sh`
- Application should run at http://localhost:8080 
- DB can be accessed at mysql://localhost:3306/tunga, check .env example for 

.env was committed to allow smooth running locally
