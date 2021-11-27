import { useI18n } from 'vue-i18n';
// https://vue-i18n.intlify.dev/
export const useI18nBatch = (messages) => {
    const i18n = useI18n();
    if (typeof messages === 'object'
        && !Array.isArray(messages)
        && messages !== null) {
        i18n.mergeLocaleMessage('default', messages);
    }
    return i18n;
};
export const withI18nBatchProps = () => ({
    i18nBatch: {
        type: Object,
        default: () => {
        },
    },
});
