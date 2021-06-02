export default {
  name: 'BaseBoldwords',
  functional: true,
  props: {
    keyword: String,
    content: String,
    tag: {
      type: String,
      default: 'div',
    },
  },
  render(h, { data, props }) {
    const { keyword, content, tag } = props;
    const keywordIndex = content.toLowerCase().indexOf(keyword.toLowerCase());

    if (keywordIndex > -1 && keyword !== '') {
      const keywordBefore = content.slice(0, keywordIndex);
      const keywordPart = content.slice(keywordIndex, keyword.length + keywordIndex);
      const keywordAfter = content.slice(keyword.length + keywordIndex, content.length);

      return h(
        tag,
        data,
        [
          keywordBefore,
          h('b', keywordPart),
          keywordAfter,
        ],
      );
    }

    return h(tag, data, content);
  },
};