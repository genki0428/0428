$('#form').validate({
  rules: {
    pass: {
      minlength: 8,
      maxlength: 24
    }
  },
  messages: {
    pass: {
        minlength: '8文字以上、24文字以内で入力してください！',
        maxlength: '8文字以上、24文字以内で入力してください！'
    }
  }
});