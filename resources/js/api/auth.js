async function authenticate(that, path){

  const params = { ...that.form };
  const res = await fetch(path, {
    method: 'post',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(params),
  });
  if(res.status == 201){
    const body = await res.json();
    const {
      token,
      data,
    } = body;
    console.log(token);
    localStorage.setItem("token", token);
    localStorage.setItem("current_user", JSON.stringify(data));
    return that.pushToHome();
  }

}

export {
  authenticate,
}
