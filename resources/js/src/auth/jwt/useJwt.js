import useJwt from '@core/auth/jwt/useJwt'
import axios from '@axios'

const { jwt } = useJwt(axios, {
    loginEndpoint: '/api/auth/login',
    registerEndpoint: '/api/auth/register',
    refreshEndpoint: '/api/auth/refresh-token',
    logoutEndpoint: '/api/auth/logout',
})

export default jwt
