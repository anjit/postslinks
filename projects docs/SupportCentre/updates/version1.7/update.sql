ALTER TABLE site_settings
ADD disable_captcha int(11) NOT NULL;

ALTER TABLE users
ADD locked_category int(11) NOT NULL;