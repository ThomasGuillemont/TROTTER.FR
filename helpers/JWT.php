<?php

//! JWT
class JWT
{
    /** //! base64url_encode(string $str)
     * @param string $str
     * 
     * @return string
     */
    private static function base64url_encode(string $str): string
    {
        return rtrim(strtr(base64_encode($str), '+/', '-_'), '=');
    }

    /** //! generate_jwt($payload)
     * @param mixed $payload
     * 
     * @return [type]
     */
    public static function generate_jwt($payload)
    {

        $headers = ['typ' => 'JWT', 'alg' => 'HS256'];
        $headers_encoded = self::base64url_encode(json_encode($headers));

        $payload_encoded = self::base64url_encode(json_encode($payload));

        $signature = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", SECRET_JWT, true);
        $signature_encoded = self::base64url_encode($signature);

        $jwt = "$headers_encoded.$payload_encoded.$signature_encoded";
        return $jwt;
    }


    /** //! is_jwt_valid($jwt)
     * @param mixed $jwt
     * 
     * @return bool
     */
    public static function is_jwt_valid($jwt): bool
    {
        //! split
        $tokenParts = explode('.', $jwt);

        $header = base64_decode($tokenParts[0]);
        $payload = base64_decode($tokenParts[1]);
        $signature_provided = $tokenParts[2];

        //! check the expiration time
        $expiration = json_decode($payload)->exp;

        $is_token_expired = ($expiration - time()) < 0;

        //! build a signature
        $base64_url_header = self::base64url_encode($header);
        $base64_url_payload = self::base64url_encode($payload);
        $signature = hash_hmac('SHA256', $base64_url_header . "." . $base64_url_payload, SECRET_JWT, true);
        $base64_url_signature = self::base64url_encode($signature);

        //! verify it matches the signature provided in the jwt
        $is_signature_valid = ($base64_url_signature === $signature_provided);

        if ($is_token_expired || !$is_signature_valid) {
            return FALSE;
        } else {
            return TRUE;
        }
    }


    /** //! get($jwt)
     * @param mixed $jwt
     * 
     * @return [type]
     */
    public static function get($jwt)
    {
        $tokenParts = explode('.', $jwt);
        $payload = json_decode(base64_decode($tokenParts[1]));
        return $payload;
    }
}
