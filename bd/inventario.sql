CREATE TABLE `comentario`(
    `idcomen` INT(11) NOT NULL,
    `usuario` VARCHAR(200) NOT NULL,
    `equipo` INT(11) NOT NULL,
    `comentario` VARCHAR(350) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
-- --------------------------------------------------------
--

-- Estructura de tabla para la tabla `equipoav`
--

CREATE TABLE `equipoav`(
    `codigo` INT(10) NOT NULL,
    `marca` VARCHAR(200) NOT NULL,
    `equipo` VARCHAR(200) NOT NULL,
    `carac` VARCHAR(350) NOT NULL,
    `estado` VARCHAR(200) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--

-- Volcado de datos para la tabla `equipoav`
--

INSERT INTO `equipoav`(
    `codigo`,
    `marca`,
    `equipo`,
    `carac`,
    `estado`
)
VALUES(
    5545,
    'Samsung',
    'Proyector',
    ' VGA\r\n                                                                  ',
    'En Reparacion'
),(
    20185,
    'Epson',
    'Proyector',
    'color blanco, hdmi y vga, ',
    'Disponible'
);
-- --------------------------------------------------------
--

-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE `reservacion`(
    `codigores` INT(11) NOT NULL,
    `reservante` VARCHAR(200) DEFAULT NULL,
    `equipo` INT(11) DEFAULT NULL,
    `horai` TIME NOT NULL,
    `horaf` TIME NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--

-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion`(
    `codigores`,
    `reservante`,
    `equipo`,
    `horai`,
    `horaf`
)
VALUES(
    1,
    'admin1',
    5545,
    '07:00:00',
    '08:20:00'
);
-- --------------------------------------------------------
--

-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario`(
    `iduser` VARCHAR(200) NOT NULL,
    `nombre` VARCHAR(200) NOT NULL,
    `apellido` VARCHAR(200) NOT NULL,
    `pass` VARCHAR(200) NOT NULL,
    `nivel` VARCHAR(200) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--

-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario`(
    `iduser`,
    `nombre`,
    `apellido`,
    `pass`,
    `nivel`
)
VALUES(
    'admin1',
    'Rafael',
    'Ramirez',
    '12345',
    'Administrador'
),(
    'admon',
    'Geovanny',
    'Ramirez',
    '12345',
    'Administrador'
),(
    'user1',
    'Geova',
    'Ram',
    '123',
    'Usuario'
);
--

-- Índices para tablas volcadas
--

--

-- Indices de la tabla `comentario`
--

ALTER TABLE
    `comentario` ADD PRIMARY KEY(`idcomen`),
    ADD KEY `usuario`(`usuario`),
    ADD KEY `equipo`(`equipo`);
    --

    -- Indices de la tabla `equipoav`
    --

ALTER TABLE
    `equipoav` ADD PRIMARY KEY(`codigo`);
    --

    -- Indices de la tabla `reservacion`
    --

ALTER TABLE
    `reservacion` ADD PRIMARY KEY(`codigores`),
    ADD KEY `reservante`(`reservante`),
    ADD KEY `equipo`(`equipo`);
    --

    -- Indices de la tabla `usuario`
    --

ALTER TABLE
    `usuario` ADD PRIMARY KEY(`iduser`);
    --

    -- AUTO_INCREMENT de las tablas volcadas
    --

    --

    -- AUTO_INCREMENT de la tabla `comentario`
    --

ALTER TABLE
    `comentario` MODIFY `idcomen` INT(11) NOT NULL AUTO_INCREMENT;
    --

    -- AUTO_INCREMENT de la tabla `reservacion`
    --

ALTER TABLE
    `reservacion` MODIFY `codigores` INT(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;
    --

    -- Restricciones para tablas volcadas
    --

    --

    -- Filtros para la tabla `comentario`
    --

ALTER TABLE
    `comentario` ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY(`usuario`) REFERENCES `usuario`(`iduser`),
    ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY(`equipo`) REFERENCES `equipoav`(`codigo`);
    --

    -- Filtros para la tabla `reservacion`
    --

ALTER TABLE
    `reservacion` ADD CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY(`reservante`) REFERENCES `usuario`(`iduser`),
    ADD CONSTRAINT `reservacion_ibfk_2` FOREIGN KEY(`equipo`) REFERENCES `equipoav`(`codigo`);