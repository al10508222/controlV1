# vue-bold-text

[![NPM version](https://img.shields.io/npm/v/vue-bold-text.svg?style=flat)](https://npmjs.com/package/vue-no-ssr) [![NPM downloads](https://img.shields.io/npm/dm/vue-bold-text.svg?style=flat)](https://npmjs.com/package/vue-no-ssr)

> 在项目中，我们会遇到要将后端返回的字符串里面的部分文字加粗的情形，这个时候，用v-html会有xxs的风险，所以我开发了这个插件，利用vue的函数式组件解决了这个问题。

## Install

```bash
npm i vue-bold-text
```

## Usage

```vue
<template>
  <div id="app">
    <h1>My Website</h1>
    <bold-text
      :keyword="keyword"
      :content="content"
      :tag="tag"
    />
  </div>
</template>

<script>
  import BoldText from 'vue-bold-text';

  export default {
    components: {
      'bold-text': BoldText
    },
    data: {
      return {
        keyword: 'test',
        content: 'This is a test!',
        tag: 'p'
      };
    }
  }
</script>
```

And you get:

```html
<div id="app">
  <h1>My Website</h1>
  <p>
    This is a <b>test</b>!
  </p>
</div>
```

## ToDo

- [ ] global replace
- [ ] give running example
