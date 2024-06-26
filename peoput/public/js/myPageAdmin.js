function func(eid) {
  if(confirm("本当に削除しても宜しいですか？")) {
    location.href ="userDel.php?id="+eid;
  } else {
    return false;
  }
}