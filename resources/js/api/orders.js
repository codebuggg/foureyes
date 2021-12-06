const checkout = (that) => {
  return fetch(`/api/orders`, {
    method: "post",
    headers: {
      'content-type': 'application/json',
    },
    body: JSON.stringify({}),
  })
}

export default {
  checkout,
};
