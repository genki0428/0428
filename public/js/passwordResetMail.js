$('#form').validate({
  rules: {
    mail: {
      required: true
    }
  },
  messages: {
    mail: {
      required: '必ず入力してください。'
    }
  }
});