cd /home/ubuntu/web;
git checkout develop;
git pull;
sudo cp -r * /var/www/html/;
sudo systemctl restart nginx;