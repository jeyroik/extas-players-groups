![tests](https://github.com/jeyroik/extas-players-groups/workflows/PHP%20Composer/badge.svg?branch=master&event=push)
![codecov.io](https://codecov.io/gh/jeyroik/extas-players-groups/coverage.svg?branch=master)
<a href="https://github.com/phpstan/phpstan"><img src="https://img.shields.io/badge/PHPStan-enabled-brightgreen.svg?style=flat" alt="PHPStan Enabled"></a>
<a href="https://codeclimate.com/github/jeyroik/extas-players-groups/maintainability"><img src="https://api.codeclimate.com/v1/badges/c76131ecf430ec1df5e2/maintainability" /></a>
<a href="https://github.com/jeyroik/extas-installer/" title="Extas Installer v3"><img alt="Extas Installer v3" src="https://img.shields.io/badge/installer-v3-green"></a>
[![Latest Stable Version](https://poser.pugx.org/jeyroik/extas-players-groups/v)](//packagist.org/packages/jeyroik/extas-q-crawlers)
[![Total Downloads](https://poser.pugx.org/jeyroik/extas-players-groups/downloads)](//packagist.org/packages/jeyroik/extas-q-crawlers)
[![Dependents](https://poser.pugx.org/jeyroik/extas-players-groups/dependents)](//packagist.org/packages/jeyroik/extas-q-crawlers)


# Описание

Пакет предоставляет функционал групп пользователей.

# Установка

`# vendor/bin/extas i`

Пакет предоставляет несколько базовых групп: `public`, `authorized`, `admin`.

Чтобы их использовать, необходимо в родительском пакете прописать импорт:

```json
{
  "import": {
    "from": {
      "extas/players-groups": {
        "players_groups": "*"
      }
    },
    "parameters": {
      "on_miss_package": {
        "name": "on_miss_package",
        "value": "throw"
      },
      "on_miss_section": {
        "name": "on_miss_section",
        "value": "throw"
      }
    }
  }
}
```

# Использование

Группа представляет собой простого пользователя с определёнными параметрами.

```php
/**
 * @var \extas\interfaces\repositories\IRepository $players
 */
$player = $players->one(['name' => 'test']);
if ($player->isGroup()) {
    $group = $player->__toGroup();
}
```

Группа совместима с пользователями, поэтому может использоваться стандартный репозиторий пользователей для сохранения и получения групп.

```php
use extas\components\players\PlayerGroup;

/**
 * @var \extas\interfaces\repositories\IRepository $players
 */

$group = new PlayerGroup();
$group->setCreatorName('test')->setCreatedAt(time())->setPrivate(true);
$players->create($group);
```