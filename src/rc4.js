function key_schedule()
{
    key_length = key.length;
    let s[256];
    for(let i = 0; i < 256; ++i)
    {
        s[i] = i;
    }
    j = 0;

    for(i = 0; i < 256; ++i)
    {
        j = (j + s[i] + key[i % key_length] % 256);
        s[i], s[j] = s[j], s[i]
    }
    return s;
}

function PRGA(s)
{
let i = 0;
let j = 0;

    while(1)
    {
        i = (i + 1) % 256;
        j = (j + s[i]) % 256;
        s[i], s[j] = s[j], s[i];
        k = s[s[i] + s[j] % 256]

        yield k
    }
}

function RC4(key)
{
    let s = key_schedule(key);
    return PRGA(s);
}

function xor(plainText, key)
{
    key = [transformar o vetor de caracteres em ascii int]
    keystream = RC4(key);
    ls = [];
    for(let i = 0; i < plainText.length; ++i)
    {

    }
}
