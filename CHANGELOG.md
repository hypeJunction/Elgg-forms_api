<a name="6.0.0"></a>
# [6.0.0] (2026-05-09)

### Breaking Changes

* Requires Elgg 6.x and PHP 8.1+

### Notes

* Bumped `elgg/elgg` requirement to `~6.1.0`; added `ext-intl` requirement
* No code changes — plugin has no JS modules and uses only stable view/format APIs
* Added per-plugin Docker test stack for Elgg 6.x (`docker/elgg6/`)

---

<a name="5.0.0"></a>
# [5.0.0] (2026-04-24)

### Breaking Changes

* Requires Elgg 5.x and PHP 8.2+

### Notes

* No code changes — plugin has no hooks/events and uses only stable Elgg view/format APIs
* Added per-plugin Docker test stack (Elgg 5.x, PHP 8.2, MySQL 8.0) — previously absent

---

<a name="4.0.0"></a>
# [4.0.0] (2026-04-15)

### Breaking Changes

* Requires Elgg 4.x
* Removed `activate.php` (blocked activation on Elgg ≥ 2.1)
* Removed `start.php`, `manifest.xml`, `autoloader.php`
* Removed `elgg_view_input()` polyfill (merged into Elgg core in 2.1)

### Features

* Added `Bootstrap.php` using `\Elgg\PluginBootstrap`
* Added `elgg-plugin.php` with PSR-4 autoload
* Updated `composer.json` to require `elgg/elgg: ^4.0`

---

<a name="1.2.1"></a>
## [1.2.1](https://github.com/hypeJunction/Elgg-forms_api/compare/1.2.0...v1.2.1) (2015-12-22)


### Bug Fixes

* **css:** ensure css works in earlier Elgg versions ([7720717](https://github.com/hypeJunction/Elgg-forms_api/commit/7720717))



<a name="1.2.0"></a>
# [1.2.0](https://github.com/hypeJunction/Elgg-forms_api/compare/1.1.0...v1.2.0) (2015-12-10)


### Bug Fixes

* **core:** enabled plugin should not short circuit the site on upgrade ([feaeef1](https://github.com/hypeJunction/Elgg-forms_api/commit/feaeef1))
* **core:** use Elgg version and not function name to decide whether plugin can be activated ([7afc9ba](https://github.com/hypeJunction/Elgg-forms_api/commit/7afc9ba))
* **releases:** rebuild changelog after git reword ([d993257](https://github.com/hypeJunction/Elgg-forms_api/commit/d993257))

### Features

* **core:** make requirements more evident ([74de9f9](https://github.com/hypeJunction/Elgg-forms_api/commit/74de9f9))
* **grunt:** adds changelog to release process ([73c86ef](https://github.com/hypeJunction/Elgg-forms_api/commit/73c86ef))
* **releases:** improved release automation ([c4927cb](https://github.com/hypeJunction/Elgg-forms_api/commit/c4927cb))



<a name="1.1.0"></a>
# 1.1.0 (2015-11-05)


### Bug Fixes

* **css:** compile missing stylesheet ([a5dd5ac](https://github.com/hypeJunction/Elgg-forms_api/commit/a5dd5ac))

### Features

* **core:** make requirements more evident ([74de9f9](https://github.com/hypeJunction/Elgg-forms_api/commit/74de9f9))
* **grunt:** adds changelog to release process ([73c86ef](https://github.com/hypeJunction/Elgg-forms_api/commit/73c86ef))



