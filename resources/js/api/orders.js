const checkout = (that) => {
  const res = fetch(`/api/orders?cart_id=${localStorage.getItem('cart-id')}`, {
    method: "post",
    headers: {
      'content-type': 'application/json',
    },
    body: JSON.stringify(that.form),
  })
  if(res.status == 201){
    return that.$router.push({ name: "thanks" });
  }
}

const find = async (id) => {
  const res = await fetch(`/api/orders/${id}`)
  if(res.status == 200){
    const body = await res.json();
    return body;
  }
}

export default {
  checkout,
  find,
};
