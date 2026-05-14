# forms_api — Architecture (Elgg 6.x)

## Summary

Provides form field rendering views for Elgg 6.x. Originally a polyfill for
`elgg_view_input()` (merged into Elgg core in 2.1). In Elgg 6.x this plugin
only exists to supply the CSS styles and view partials for field wrappers
(`elgg-field`, `elgg-field-label`, `elgg-field-required`).

## Directory Structure

```
forms_api/
├── classes/hypeJunction/FormsApi/
│   └── Bootstrap.php          # Elgg 6.x plugin bootstrap
├── languages/
│   └── en.php                 # String: 'field:required'
├── sass/elements/forms/
│   └── field.scss             # Source SCSS (not compiled at runtime)
├── views/default/elements/forms/
│   ├── field.php              # Wraps label + input + help in .elgg-field div
│   ├── help.php               # Renders .elgg-field-help div
│   ├── input.php              # Delegates to input/$input_type view
│   └── label.php              # Renders .elgg-field-label with required indicator
├── views/default/elements/forms/
│   └── field.css              # Extended into css/elgg and css/admin
├── composer.json
└── elgg-plugin.php
```

## Registered Hooks/Events

None — this plugin registers no hooks or events.

## Views Extended

| Base view | Appended view |
|-----------|---------------|
| `css/elgg` | `elements/forms/field.css` |
| `css/admin` | `elements/forms/field.css` |

## Dependencies

None (no plugin dependencies).

## Migration Notes (2.x → 4.x)

- **activate.php removed**: original file blocked activation on Elgg ≥ 2.1; removed entirely
- **autoloader.php removed**: no classes existed in 2.x; PSR-4 autoload now in `composer.json`
- **elgg_view_input() polyfill removed**: function is in Elgg core since 2.1
- **start.php removed**: replaced with `Bootstrap::init()`
- **manifest.xml removed**: replaced by `elgg-plugin.php`
- **Bootstrap class**: implements `\Elgg\PluginBootstrap`; only `init()` is non-empty

## Migration Notes (4.x → 5.x)

- **composer.json**: bumped `php >=7.4 → >=8.2`, `elgg/elgg ^4.0 → ^5.0`
- **elgg-plugin.php**: version bumped `4.0.0 → 5.0.0`
- **Bootstrap class**: unchanged — `\Elgg\PluginBootstrap` base class is still valid in 5.x
- **No hooks/events**: plugin has no `'hooks'` key, so the 4→5 hooks→events merge is a no-op here
- **Docker test stack**: added per-plugin `docker/` scaffold (Elgg 5.x, PHP 8.2, MySQL 8.0) — the 4.x migration pre-dated the per-plugin test stack convention

## Migration Notes (5.x → 6.x)

- **composer.json**: bumped `elgg/elgg ^5.0 → ~6.1.0`, version `5.0.0 → 6.0.0`, added `ext-intl`
- **elgg-plugin.php**: version bumped `5.0.0 → 6.0.0`
- **No JS**: plugin has no AMD/RequireJS modules — AMD→ESM change is a no-op here
- **No removed functions**: plugin uses only stable CSS-extend and view APIs unchanged in 6.x
- **docker/elgg6/**: added per-plugin Docker test stack for Elgg 6.x
