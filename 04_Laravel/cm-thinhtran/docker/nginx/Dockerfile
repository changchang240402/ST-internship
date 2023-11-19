# Use the official Nginx image as the base image
FROM nginx:stable-alpine

# Remove the default Nginx configuration
RUN rm /etc/nginx/conf.d/default.conf

# Copy your custom Nginx configuration to the container
COPY ./docker/nginx/nginx.conf /etc/nginx/conf.d/
