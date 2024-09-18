@echo off
schtasks /create /tn "CamppCron" /tr "\"C:\xampp\php\php-win.exe\" \"C:\xampp\htdocs\Food-Delivery-System\Food Delivery System\cronjob.php\"" /sc minute /mo 1

echo Task "CamppCron" created successfully.
pause
