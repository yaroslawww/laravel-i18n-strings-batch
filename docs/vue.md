# Usage with vue

## Dependency install example (optional way)

```shell
yarn add vue-i18n@next
```

```js
// plugins/vue-i18n.js
import {createI18n} from 'vue-i18n';

const i18n = createI18n({
    legacy: false,
    locale: 'default',
    fallbackLocale: 'default',
    messages: {
        default: {
            version: process.env.PACKAGE_VERSION,
        },
    },
    warnHtmlMessage: false,
});

export default i18n;
```

```js
// app.js
import i18n from '@/plugins/vue-i18n';

const app = createApp(/* ... */);
app.use(i18n);
// ...
```

## Configure

Add alias

```json
alias: {
'@i18nBatch': path.resolve('vendor/yaroslawww/laravel-i18n-strings-batch/resources/js/vue'),
},
```

Composition api

```vue

<template>
    <div>
        {{ t('foo.bar') }}
    </div>
</template>

<script>
import {useI18nBatch, withI18nBatchProps} from '@i18nBatch/composables/useI18nBatch';

export default {
    name: 'Example',
    props: {
        ...withI18nBatchProps(),
    },
    setup(props) {
        const {t} = useI18nBatch(props.i18nBatch);
        return {
            t,
        };
    },
};
</script>
```

Standard api

```vue

<template>
    <div>
        {{ t('foo.bar') }}
    </div>
</template>

<script>
import {useI18nBatch, withI18nBatchProps} from '@i18nBatch/composables/useI18nBatch';

export default {
    name: 'Example',
    props: {
        ...withI18nBatchProps(),
    },
    data() {
        return {
            t: () => {
            },
        };
    },
    mounted() {
        const {t} = useI18nBatch(this.i18nBatch);
        this.t = t;
    },
};
</script>
```
