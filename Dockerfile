FROM ubuntu:20.04
RUN sudo apt install php8.01

ENV DB_DNS = mysql:host=localhost;dbname=mvc;
ENV DB_USER = root
ENV DB_PASS = root

CMD ['php -S localhost:8080 -t public']