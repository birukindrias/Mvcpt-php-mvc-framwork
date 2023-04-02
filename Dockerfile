FROM ubuntu:20.04
# RUN sudo apt install ph/p8.1
RUN php -S localhost:8080 -t public
ENV DB_DNS = mysql:host=localhost;dbname=umvc;
ENV DB_USER = bix
ENV DB_PASS = root

CMD ["php -S localhost:8080 -t public"]