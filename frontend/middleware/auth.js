export default function (context) {
  console.log('okk')
  if (!context.$auth) {
    return context.redirect('/login')
  }
}
