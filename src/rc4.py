import codecs
############FIRST STAP##################
#!      Encrypting the key
# Utilize the key schedule algorithm
# Create a list with 256 positions
# Go through list permuting values
#-----------Variables-------------------
# key_length -> stores the number of elements of key
# s -> list contenting [0 ... 255] numbers
# j -> responsable to store the permutation indice

def key_schedule(key):
    key_length = len(key)
    s = list(range(256))
    j = 0

    for i in range(256):
        j = (j + s[i] + key[i % key_length]) % 256
        s[i], s[j] = s[j], s[i]

    return s


##########SECOND STEP######################
#!      Continue encrypting the key
# Utilize the PRGA algorithm
# Generate the pseudo aleatory bytes sequence
#-----------Variable----------------------------
# i -> Indice of list that gonna be permuted
# j -> Indice of list that gonna be permuted
# k -> Indice of list that store result permutation for iteration
# key -> List to store permutation

def PRGA(s):
    i = 0
    j = 0

    while True:
        i = (i + 1) % 256
        j = (j + s[i]) % 256
        s[i], s[j] = s[j], s[i]
        k = s[(s[i] + s[j]) % 256]

        yield k

#########THIRD STAP###############################
#!      Prepare the key
# Apply the functions key_schedule and PRGA

def RC4(key):
    s = key_schedule(key)
    return PRGA(s)

#########FOURTH STAP###############################
#!     Transform string list in integer
def xor(plainText, key):
    key = [ord(c) for c in key]
    keystream = RC4(key)
    ls = []
    for c in plainText:
        conver_xor = ("%02X" % (c ^ next(keystream)))
        ls.append(conver_xor)
    return ''.join(ls)

def encrypt(plainText, key):
    plainText = [ord(c) for c in plainText]
    return xor(plainText, key)

def decrypt()
key = 'Key'
plainText = 'Plaintext'

print(encrypt(plainText, key))
