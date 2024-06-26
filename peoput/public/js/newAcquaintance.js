$('#form').validate({
  rules: {
    community: {
      required: true
    }
  },
  messages: {
    community: {
      required: 'これは必須項目です！'
    }
  }
});