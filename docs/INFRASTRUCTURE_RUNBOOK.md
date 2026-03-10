# INFRASTRUCTURE RUNBOOK
AlmaDesign

Version: 1.0  
Maintainer: Mauricio Cordero  
Date: 2026

---

# 1. Overview

This document describes the infrastructure used to run the AlmaDesign website and development environment.

The objective is to allow full reconstruction of the infrastructure in case of failure or migration.

---

# 2. Domain

Domain provider:

NIC Chile

Domain:

almadesign.cl

DNS management:

Cloudflare

---

# 3. DNS

Provider:

Cloudflare

Dashboard:

https://dash.cloudflare.com

Main records:

A record

almadesign.cl → 52.37.177.196

www → 52.37.177.196

---

# 4. Cloud Infrastructure

Provider:

AWS Lightsail

Instance name:

os-alma-server-01

Region:

us-west-2 (Oregon)

Public IP:

52.37.177.196

Private IP:

172.26.8.105

---

# 5. Server Access

SSH user:

ubuntu

SSH command:

ssh -i "C:\AWS\mauricio-lightsail-key.pem" ubuntu@52.37.177.196

Keypair name:

mauricio-lightsail-key

---

# 6. Web Server

Web server:

Nginx

Configuration location:

/etc/nginx/sites-available/almadesign

Web root:

/var/www/almadesign

---

# 7. SSL

Certificate provider:

Let's Encrypt

Managed with:

Certbot

Renewal command:

sudo certbot renew

---

# 8. Application Repository

Repository:

https://github.com/mcorderoaraya/almadesign

Deployment model:

Manual pull

git pull origin main

---

# 9. Email Infrastructure

Provider:

Zoho Mail

Authentication:

SPF  
DKIM  
DMARC

Admin panel:

https://mailadmin.zoho.com

---

# 10. Backup Procedure

Create backup of website:

sudo tar -czvf almadesign-backup.tar.gz /var/www/almadesign

Backup location:

/home/ubuntu/almadesign-backup.tar.gz

Download backup from local machine:

scp -i "C:\AWS\mauricio-lightsail-key.pem" ubuntu@52.37.177.196:/home/ubuntu/almadesign-backup.tar.gz .

---

# 11. Disaster Recovery

If AWS infrastructure becomes unavailable:

1. Create new server in any provider
2. Install nginx
3. Upload backup
4. Restore site files
5. Update DNS record in Cloudflare

---

# 12. Monitoring

Manual monitoring currently.

Future tasks:

- billing alerts
- server monitoring
- automatic backups

---

# 13. Current Known Issue

AWS account temporarily suspended due to billing or verification process.

Website remains operational.

Recovery in progress.