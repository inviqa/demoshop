FROM quay.io/continuouspipe/symfony-php7.1-nginx:v1.0

RUN apt-get update && \
    apt-get install -y php7.0-pgsql php7.0-gmp postgresql-client

RUN curl -sL https://deb.nodesource.com/setup_5.x | bash - && \
    apt-get install -y nodejs build-essential && \
    npm install -g antelope

ARG GITHUB_TOKEN=
ARG SYMFONY_ENV=prod
ENV SYMFONY_ENV $SYMFONY_ENV

COPY . /app
RUN container build
