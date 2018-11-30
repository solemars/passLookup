
--
-- 데이터베이스: `ipsi`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `sg_pass`
--

CREATE TABLE `sg_pass` (
  `pType` varchar(10) NOT NULL,
  `pNum` varchar(20) NOT NULL,
  `pSchool` varchar(20) NOT NULL,
  `pName` varchar(20) NOT NULL,
  `pBirth` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

