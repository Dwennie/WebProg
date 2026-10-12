FROM node:24

WORKDIR /var/www

COPY myFirstApp/package*.json ./

RUN npm install

# Install PHP 8.4 (Debian's default is 8.2 which fails on PHP 8.4+ syntax in vendor dependencies)
RUN apt-get update && apt-get install -y lsb-release ca-certificates curl gnupg \
    && curl -sSLo /usr/share/keyrings/deb.sury.org-php.gpg https://packages.sury.org/php/apt.gpg \
    && echo "deb [signed-by=/usr/share/keyrings/deb.sury.org-php.gpg] https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list \
    && apt-get update \
    && apt-get install -y php8.4-cli php8.4-xml php8.4-mbstring \
    && ln -sf /usr/bin/php8.4 /usr/bin/php \
    && rm -rf /var/lib/apt/lists/*