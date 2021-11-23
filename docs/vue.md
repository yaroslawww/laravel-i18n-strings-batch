# Usage with vue

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
