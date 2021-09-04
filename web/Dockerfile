FROM nginx:latest

RUN apt-get update
RUN apt-get install apt-transport-https lsb-release ca-certificates wget -y
RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
RUN sh -c 'echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list'
RUN apt-get update && apt-get install -y \
  php8.0-fpm \
  php8.0-mysql \
  php-mbstring \
  php-xml \
  php-curl \
  zip \
  unzip

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.38.0/install.sh | bash \
  && . ~/.bashrc \
  && nvm install --lts

COPY www.conf /etc/php/8.0/fpm/pool.d/www.conf
COPY default.conf /etc/nginx/conf.d/default.conf
COPY startup.sh /startup.sh
RUN  chmod 744 /startup.sh
WORKDIR /usr/share/nginx/html

ENTRYPOINT  ["/startup.sh"]
