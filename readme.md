# Получаем подсети из списка ip адресов

_Скрипт загружает списки ip-адресов из репозитория [discord-voice-ips](https://github.com/GhostRooter0953/discord-voice-ips) и проходит по нему, получая подсети._

## Запуск
```php get_subnets.php```
И можем уходить пить чай/кофе. Скрипт отрабатывает несколько минут, из-за большого списка.

## Вывод скрипта
На момент создания список подсетей был таким
```
66.22.192.0/18
35.240.0.0/13
35.224.0.0/12
35.208.0.0/12
35.192.0.0/12
34.2.0.0/16
34.0.0.0/15
34.3.2.0/24
34.3.0.0/23
104.16.0.0/12
162.158.0.0/15
172.64.0.0/13
204.11.56.0/23
23.227.32.0/19
3.128.0.0/9
```

## Дополнительно
В файле other.txt можно дополнять своими ip-адресамм. Например, я дополнил его доменом media.discordapp.net. Формат как и у других списков.

## AmneziaWG
Для использования в amneziaWG, нужно прописать сети из списка по аналогии:
```
AllowedIPs = 66.22.192.0/18, 35.240.0.0/13, 35.224.0.0/12, 35.208.0.0/12, 35.192.0.0/12, 34.2.0.0/16, 34.0.0.0/15, 34.3.2.0/24, 34.3.0.0/23, 104.16.0.0/12, 162.158.0.0/15, 172.64.0.0/13, 204.11.56.0/23, 23.227.32.0/19, 3.128.0.0/9

```
