# Dockerfile para la base de datos (MariaDB)
FROM mariadb:10.5

# Configuración del entorno
ENV MYSQL_ROOT_PASSWORD=root
ENV MYSQL_DATABASE=sample
ENV MYSQL_USER=sampleuser
ENV MYSQL_PASSWORD=samplepass

# Copiar el script de inicialización
COPY db.sql /docker-entrypoint-initdb.d/db.sql



# Exponer el puerto de MariaDB
EXPOSE 3306

CMD ["mysqld"]