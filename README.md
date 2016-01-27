# City Department

Міський департамент поліції онлайн надає моливість перегляду злочинів на карті, інформації про управління, відділеня та відділки поліції.

## Ліцензія

Дивіться файл LICENCE

## Налаштування середовища розробки

Для створення середовища розробки вам необхідно встановити наступні програмні продукти:

* [Vagrant](https://www.vagrantup.com/downloads.html)
* [VirtualBox](

Якщо ви користуєтесь Linux чи OSX то також рекомендується встановити Ansible.

Після встановлення Vagrant потрібно поставити додатково плагін ```vagrant-hostsupdater```. Для цього в поточній директорії запустіть

    vagrant plugin install vagrant-hostsupdater
    
Коли всі додатки будуть встановлено запустіть:

    vagrant up

і середовище розробки буде автоматично створено для вас. Доступитись до сервера з кодом можна за адресою: [http://police.local/](http://police.local).


## Як внести свій вклад?

* Зробіть форк цього репозиторію.
* Зробіть необхідні зміни до коду в окремій гілці логічно назваши її.
* Оформіть пулл реквест до цього репозиторію з описом змін і нововведень, що ви зробили.