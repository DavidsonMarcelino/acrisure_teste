
# Orientações de uso
Olá, ao decorrer do desenvolvimento desse teste, eu notei que tinha tempo de sobra e decidi me empolgar um pouco mais com ele, então o projeto funciona de duas formas:

Para ambos, ligue o servidor:

```php
php artisan serve
```

# Primeira forma: chamando diretamente a API

Basta chamar as rotas, todas são POST e esperam os dados como parâmetros da requisição, o que permite a requisição ser testada via Postman.

```url
http://localhost:8000/api/v1/primeiro
```

Note que após a raiz, há também um path indicando a API (/api/v1), e depois, o número do desafio como posição, abaixo deixarei todos por nome:

- primeiro (espera receber uma string "frase")
- segundo  (espera receber uma string "frase")
- terceiro (espera receber uma string "numeros")
- quarto   (espera receber duas strings "frase1" e "frase2")
- quinto   (espera receber uma string "frase")
- sexto    (espera receber uma string "frase")
- setimo   (espera receber dois arrays "frase1" e "frase2")
- oitavo   (espera receber uma string "frase")
- nono     (espera receber uma string "frase")

# Segunda forma: front-end

Desenvolvi um pequeno front com alguns blade's simples, JQuery e Bootstrap.

Para acessa-lo, após iniciar o servidor, basta acessar a raiz, lá há o caminho para todos os desafios.

```url
http://localhost:8000/
```

# Desafio de Programação

Crie um repositório no seu GITHUB, resolva as questões abaixo e nos envie o link para avaliarmos as respostas.  
:D  

---

## 1 - Verificar se uma frase é pangramática

Uma frase pangramática utiliza todas as letras do alfabeto pelo menos uma vez.  
Por exemplo, a sentença `"Quero faxina nas locadoras de video: jogue blitz com whisky PM"` cumpre essa característica, pois contém cada letra de A a Z ao menos uma vez (detalhes extras podem ser ignorados).  

Dado um texto, determine se ele é pangramático ou não. Retorne `True` caso seja, e `False` caso contrário.  
Desconsidere números e símbolos de pontuação na verificação.  

```php
var_dump(isPagramatica("Quero faxina nas locadoras de video: jogue blitz com whisky PM")); // true
var_dump(isPagramatica("You shall not pass!")); // false
```

## 2 - Remover vogais de comentários ofensivos

Comentários indesejados estão invadindo sua página!  

Uma estratégia eficiente para lidar com isso é eliminar todas as vogais presentes nas mensagens ofensivas, enfraquecendo o impacto delas.  

O desafio é criar uma função que receba um texto e devolva uma nova versão sem nenhuma vogal.  

Por exemplo, ao processar a frase `"This website is for losers LOL!"`, o resultado seria `"sts st pr prdrs LL!"`.  

```php
var_dump(removeVowel("This website is for losers LOL!") == "Ths wbst s fr lsrs LL!"); // true
var_dump(removeVowel("No offense but, Your writing is among the worst I've ever read") == "N ffns bt, Yr wrtng s mng th wrst 'v vr rd");
var_dump(removeVowel("What are you, a communist?") == "Wht r y,  cmmnst?"); 
```

## 3 - Encontrar o maior e o menor número em uma sequência

Nesta pequena tarefa, você recebe uma sequência de números separados por espaços e deve retornar o maior e o menor número.  

**Exemplos:**  
```php
echo highAndLow("1 2 3 4 5");  // 5 1
echo highAndLow("1 2 -3 4 5"); // 5 -3
echo highAndLow("1 9 3 4 -5"); // 9 -5
```

## 4 - Verificar se uma string termina com outra

Complete a solução para que ela retorne verdadeiro se o primeiro argumento (string) passado terminar com o segundo argumento (também uma string).  

**Exemplos:**  
```php
var_dump(solution("abc", "bc")); // true
var_dump(solution("abc", "d"));  // false
```

## 5 - Inverter palavras em uma frase

Complete a função que aceita um parâmetro string e inverte cada palavra na string. Todos os espaços na string devem ser mantidos.  

**Exemplos:**  
```php
echo reverseWords("This is an example!"); // "sihT si na !elpmaxe"
echo reverseWords("double  spaces");      // "elbuod  secaps"
```

**Notas**
```php
Se o número tiver um número ímpar de dígitos, basta adicionar o número de um único dígito no centro (veja o exemplo nº 1).
Qualquer número preenchido com zeros conta como um único dígito (veja o exemplo nº 2).
```

## 6 - Contar caracteres únicos

Dado um texto, retorne a quantidade de caracteres distintos (desconsiderando espaços e pontuação).

**Exemplo:**
```php
"hello world" ➝ 7   (h, e, l, o, w, r, d)
"banana"      ➝ 3   (b, a, n)
```

## 7 - Interseção de arrays

Crie uma função que receba dois arrays e retorne apenas os elementos comuns entre eles

**Exemplo:**
```php
[1, 2, 3, 4], [3, 4, 5, 6] ➝ [3, 4]  
["a", "b", "c"], ["c", "d"] ➝ ["c"]
```

## 8 - Compactar string (Run-Length Encoding)

Implemente um algoritmo que compacte uma string contando repetições consecutivas de caracteres.

**Exemplo:**
```php
"aaabbc" ➝ "a3b2c1"  
"xxxxxyyyz" ➝ "x5y3z1"
```

## 9 - Validar parênteses balanceados

Crie uma função que determine se uma string tem parênteses corretamente balanceados.

**Exemplo:**
```php
"(())"   ➝ true  
"(()"    ➝ false  
"())("   ➝ false  
"()()()" ➝ true
```
