--- Part Two ---
----------------

The clerk quickly discovers that there are still invalid IDs in the ranges in your list. Maybe the young Elf was doing other silly patterns as well?

Now, an ID is invalid if it is made only of some sequence of digits repeated *at least* twice. So, `12341234` (`1234` two times), `123123123` (`123` three times), `1212121212` (`12` five times), and `1111111` (`1` seven times) are all invalid IDs.

From the same example as before:

- `11-22` still has two invalid IDs, `<em>11</em>` and `<em>22</em>`.
- `95-115` now has two invalid IDs, `<em>99</em>` and `<em>111</em>`.
- `998-1012` now has two invalid IDs, `<em>999</em>` and `<em>1010</em>`.
- `1188511880-1188511890` still has one invalid ID, `<em>1188511885</em>`.
- `222220-222224` still has one invalid ID, `<em>222222</em>`.
- `1698522-1698528` still contains no invalid IDs.
- `446443-446449` still has one invalid ID, `<em>446446</em>`.
- `38593856-38593862` still has one invalid ID, `<em>38593859</em>`.
- `565653-565659` now has one invalid ID, `<em>565656</em>`.
- `824824821-824824827` now has one invalid ID, `<em>824824824</em>`.
- `2121212118-2121212124` now has one invalid ID, `<em>2121212121</em>`.

Adding up all the invalid IDs in this example produces `<em>4174379265</em>`.

*What do you get if you add up all of the invalid IDs using these new rules?*
