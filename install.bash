SYSTEMPATH = "/home/ubuntu/acpanel"

echo "Configuring apache"
aptitude install apache
mv /etc/apache2/apache2.conf /etc/apache2/apache2.conf.backup
ln -s "${SYSTEMPATH}/etc/apache2/apache2.conf" /etc/apache2/
mv /etc/apache2/sites-enabled /etc/apache2/sites-enabled.back
ln -s /home/ubuntu/acpanel/etc/apache2/sites-enabled /etc/apache2/
ln -s /etc/apache2/mods-available/socache_shmcb.load /etc/apache2/mods-enabled/
ln -s /etc/apache2/mods-available/ssl.conf /etc/apache2/mods-enabled/
ln -s /etc/apache2/mods-available/ssl.load /etc/apache2/mods-enabled/
