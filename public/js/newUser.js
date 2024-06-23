$('#form').validate({
  rules: {
    accountName: {
      required: true,
      maxlength: 20
    },
    mail: {
      required: true,
      email: true
    },
    pass: {
      required: true,
      minlength: 8,
      maxlength: 24
    }
  },
  messages: {
    accountName: {
        required: 'これは必須項目です！',
        maxlength: '10文字以内で入力してください！'
    },
    mail: {
        required: 'これは必須項目です！',
        email: '適切に入力してください！'
    },
    pass: {
        required: 'これは必須項目です！',
        minlength: '8文字以上、24文字以内で入力してください！',
        maxlength: '8文字以上、24文字以内で入力してください！'
    }
  }
});