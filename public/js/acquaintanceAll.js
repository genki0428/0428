function func(eid) {
  if(confirm("本当に削除しても宜しいですか？")) {
    location.href ="acquaintanceDel.php?id="+eid;
  } else {
    return false;
  }
}