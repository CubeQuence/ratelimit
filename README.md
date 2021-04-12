<p align="center"><a href="https://github.com/CubeQuence/ratelimit"><img src="https://rawcdn.githack.com/CubeQuence/CubeQuence/855a8fe836989ca40c4e50a889362975eab9ac43/public/assets/images/banner.png"></a></p>

<p align="center">
<a href="https://packagist.org/packages/cubequence/ratelimit"><img src="https://poser.pugx.org/cubequence/ratelimit/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/cubequence/ratelimit"><img src="https://poser.pugx.org/cubequence/ratelimit/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/cubequence/ratelimit"><img src="https://poser.pugx.org/cubequence/ratelimit/license.svg" alt="License"></a>
</p>

# Ratelimit

Ratelimit logic for CubeQuence/framework

## Installation

1. `composer require cubequence/ratelimit`
2. Copy config from https://github.com/CubeQuence/CubeQuence/blob/master/config/ratelimit.php to `config/`
3. Copy migration from https://github.com/CubeQuence/CubeQuence/blob/master/database/migrations/20200517193839_create_rate_limit_table.php to `database/migrations/`
4. Run migrations `php cubequence db:migrate`

## Example

Look at the `examples` folder

## Security Vulnerabilities

Please review [our security policy](https://github.com/CubeQuence/ratelimit/security/policy) on how to report security vulnerabilities.

## License

Heavily inspired by:
- https://github.com/nikolaposa/rate-limit

The CubeQuence software is open-sourced software licensed under the [MIT license](LICENSE.md).
