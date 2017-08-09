import Auth from '../common/services/auth';

Vue.http.interceptors.push((request, next) => {

    request.headers.set('Authorization', Auth.getAuthorizationHeader());

    return next();

});


Vue.http.interceptors.push((request, next) => {

    console.log(request);

    return next();

});